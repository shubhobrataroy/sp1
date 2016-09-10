using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Windows;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Pending.xaml
    /// </summary>
    public partial class Pending : MahApps.Metro.Controls.MetroWindow
    {

        private List<String> accept;
        private List<String> reject;
        public Pending()
        {
            accept = new List<string>();
            reject = new List<string>();
            InitializeComponent();
            using (sql.dataService service = new sql.dataService("registration"))
            {
                PendingTable.DataContext = service.Select("uname,email,address", "").DefaultView;
            }
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            var workers = new BackgroundWorker();
            workers.RunWorkerCompleted += new RunWorkerCompletedEventHandler(workDone);
            workers.DoWork += new DoWorkEventHandler(doWork);
            workers.RunWorkerAsync();

            
        }

        private void doWork(object sender, DoWorkEventArgs args)
        {
            accepted();
            
        }
        private void workDone(object sender, RunWorkerCompletedEventArgs args)
        {
            rejected();
        }
        void accepted()
        {
            foreach(string username in accept)
            {
                string password;
                using (sql.dataService service = new sql.dataService("registration"))
                {
                    password = service.SelectOnlyOneValue("password", "uname='" + username + "'");
                    service.Delete("uname='" + username + "'");
                    using (sql.dataService acceptService = new sql.dataService("details"))
                        acceptService.Insert("'" + username + "','" + password + "','employee','offline'");
                }
            }
            using (sql.dataService service = new sql.dataService("registration"))
            {
                PendingTable.DataContext = null;
                PendingTable.DataContext = service.Select("uname,email,address", "").DefaultView;
            }
        }

        void rejected()
        {
            foreach (string username in reject)
            {
                using (sql.dataService service = new sql.dataService("registration"))
                {
                    service.Delete("uname='" + username + "'");
                }
            }
            using (sql.dataService service = new sql.dataService("registration"))
            {
                PendingTable.DataContext = null;
                PendingTable.DataContext = service.Select("uname,email,address", "").DefaultView;
            }
        }

        void OnChecked(object sender, RoutedEventArgs e) //Stores usernames to be accepted 
        {
           DataRowView row=(DataRowView)  PendingTable.SelectedItems[0];
            this.accept.Add(row[0].ToString());
        }
        void OnChecked2(object sender, RoutedEventArgs e)
        {
            DataRowView row = (DataRowView)PendingTable.SelectedItems[0]; // Took me 5 hours to solve -_-
            this.reject.Add(row[0].ToString());
        }
    }
}
