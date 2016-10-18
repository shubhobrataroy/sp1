using System;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Input;
using System.Windows.Media;
using MahApps.Metro.Controls.Dialogs;
using MahApps.Metro.Controls;
using System.ComponentModel;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for login.xaml
    /// </summary>
    public partial class login : Page
    {
        public login()
        {
            InitializeComponent();
            
        }


        private void initiateLogin()
        {
            
            bool resultFound;

            if (username.Text.ToLower() == "maintainance" && password.Password == "1234")
            {
                MainWindow.pageContainer.Navigate(new SP1_Material.Maitainance.maintainance_page());
            }

            else
            {
                try
                {
                    using (sql.dataService service = new sql.dataService("details"))
                        resultFound = service.ExecuteQuery("select * from details where username='" + username.Text + "' and password='" + password.Password + "'");

                    if (resultFound)
                    {
                        if (username.Text.ToLower() == "admin")
                        {
                            MainWindow.pageContainer.Navigate(new admin_page());
                        }



                        else
                            MessageBox.Show(username.Text);
                    }
                    else MessageBox.Show("Wrong Username or password");
                }
                catch (MySql.Data.MySqlClient.MySqlException ex)
                {
                    Test.Logger.AppendException(ex.ToString());
                    showMessage("ERROR", "Could not connect to server");
                }
            }
        }

        public void showMessage (string title , string message)
        {
            this.TryFindParent<MainWindow>().ShowMessageAsync(title, message);
        }

        private void Login_Click(object sender, RoutedEventArgs e)
        {
                initiateLogin();
        }

        private void username_focus_lost(object sender, EventArgs e)
        {
            Suggestor.Text = "";
            if (username.Text == "")
            { username.Text = "Username"; username.Foreground = Brushes.Gray; }
            }

        private void username_focus_gained(object sender, EventArgs e)
        {
            if (username.Text == "Username")
             username.Text = "";
            username.Foreground = Brushes.Black;
        }


        private void password_focus_lost(object sender, EventArgs e)
        {
            if (password.Password == "")
            { passwordBlock.Text = "Password";  }
        }

        private void password_focus_gained(object sender, EventArgs e)
        {
            if (passwordBlock.Text == "Password")
                passwordBlock.Text = "";
        }
        private void textBox1_KeyPress(object sender, KeyEventArgs e)
        {
            TextBox sentby;
            if (e.Key == Key.Enter && (sentby=(TextBox)sender).Text !="")
            {
                e.Handled = true;
                    password.Focus();    
            }
        }
        private void textBox2_KeyPress(object sender, KeyEventArgs e)
        {
            
            if (e.Key == Key.Enter)
            {
                e.Handled = true;
                initiateLogin();
            }
            
        }

        private string currentText;
        
        private void username_TextChanged(object sender, TextChangedEventArgs e)
        {
            if (((TextBox)sender).Text != "")
            {
                currentText = ((TextBox)sender).Text;
                BackgroundWorker worker = new BackgroundWorker();
                worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(workDone);
                worker.DoWork += new DoWorkEventHandler(doWork);
                worker.RunWorkerAsync();
            }
            else
                Suggestor.Text = "";
            
        }

        private void Login_Click_1(object sender, RoutedEventArgs e)
        {

        }

        private void Page_Loaded(object sender, RoutedEventArgs e)
        {
            username.Focus();
        }

        private void username_TextChanged_1(object sender, TextChangedEventArgs e)
        {

        }

        private string suggestion;
        private void doWork(object sender, DoWorkEventArgs args)
        {
            try
            {
                using (sql.dataService service = new sql.dataService("details"))
                    suggestion = "Suggestion :\n" + service.SelectOnlyOneValue("username", "username like '" + currentText + "%'");
            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                Test.Logger.AppendException(ex.ToString());
                suggestion = "Server Error";
            }

        }
        private void workDone(object sender, RunWorkerCompletedEventArgs args)
        {
            Suggestor.Text = suggestion;
        }
    }
}
