using System;
using System.ComponentModel;
using System.Windows;
using System.Windows.Controls;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Task_Assigner.xaml
    /// </summary>
    public partial class Task_Assigner : MahApps.Metro.Controls.MetroWindow
    {
        public Task_Assigner()
        {
            InitializeComponent();
        }

        private void textBox_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private string currentText;
        private string suggestion;
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
                suggestor.Text = "";

        }
        private void doWork(object sender, DoWorkEventArgs args)
        {
            try
            {
                using (sql.dataService service = new sql.dataService("details"))
                    suggestion = "Suggestion :" + service.SelectOnlyOneValue("username", "username like '" + currentText + "%'");
            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                Test.Logger.AppendException(ex.ToString());
                suggestion = "Server Error";
            }

        }
        private void workDone(object sender, RunWorkerCompletedEventArgs args)
        {
            suggestor.Text = suggestion;
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            if( username.Text == "" )
            {
                MessageBox.Show("Please complete all the fields ");
            }
            else
            {
                try
                {
                    MessageBox.Show("'" + username.Text + "','admin','" + description.Text+ "','assigned','" + tools.utility.ConvertToDateString(startdate) + "','" + tools.utility.ConvertToDateString(enddate) + "',''");
                    //using (sql.dataService service = new sql.dataService("task"))
                    //service.Insert("'" + username.Text + "','admin','" + description.Selection.Text + "','assigned','" + tools.utility.ConvertToDateString(startdate) + "','" + tools.utility.ConvertToDateString(enddate) + "',''");
                    //MessageBox.Show("'" + username.Text + "','admin','" + description.Selection.Text + "','assigned','" + tools.utility.ConvertToDateString(startdate) + "','" + tools.utility.ConvertToDateString(enddate) + "',''");
                    //MessageBox.Show("Task assigned to " + username.Text);
                }
                catch (Exception ex)
                {
                    Test.Logger.AppendException(ex.ToString());
                    MessageBox.Show("Server Error");
                }
            }
        }

        private void startDate_SelectedDateChanged(object sender, SelectionChangedEventArgs e)
        {
            startdate = startDate.SelectedDate;
        }

        private void endDate_SelectedDateChanged(object sender, SelectionChangedEventArgs e)
        {
            enddate = endDate.SelectedDate;
        }

        private DateTime? startdate;
        private DateTime? enddate;

        private void description_TextChanged(object sender, TextChangedEventArgs e)
        {

        }
    }
}
