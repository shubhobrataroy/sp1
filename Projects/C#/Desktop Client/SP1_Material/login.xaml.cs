using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

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
            MessageBox.Show(username.Text);
            bool resultFound;
            using (sql.dataService service = new sql.dataService("details"))
                resultFound = service.ExecuteQuery("select * from details where username='" + username.Text + "' and password='" + password.Password + "'");

            MessageBox.Show(Test.Logger.GetExceptionList());
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

        private void Login_Click(object sender, RoutedEventArgs e)
        {
            initiateLogin();
        }

        private void username_focus_lost(object sender, EventArgs e)
        {
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

        private void username_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void Login_Click_1(object sender, RoutedEventArgs e)
        {

        }

        private void Page_Loaded(object sender, RoutedEventArgs e)
        {
            username.Focus();
        }
    }
}
