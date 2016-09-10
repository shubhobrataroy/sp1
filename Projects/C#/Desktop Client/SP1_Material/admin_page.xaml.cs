using System;
using System.ComponentModel;
using System.Data;
using System.Windows;
using System.Windows.Controls;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for admin_page.xaml
    /// </summary>
    public partial class admin_page : Page
    {
        private DataView noticeData;
        private string pendingNumbers;
        private string noticeNumbers;
        private string taskNumbers;
        private string onlineNumbers;
        public admin_page()
        {
            InitializeComponent();
            
            //Loading data to all components for the 1st time
            updateNotice();
            this.Dispatcher.Invoke(new Action(refreshOnline));
            this.Dispatcher.Invoke(new Action(refreshPending));
            this.Dispatcher.Invoke(new Action(refreshTask));
            this.Dispatcher.Invoke(new Action(refreshNotice));


            runTimer();   
        }

        public void updateNotice()
        {
            BackgroundWorker worker = new BackgroundWorker();
            worker.DoWork += new DoWorkEventHandler(delegate (object sender, DoWorkEventArgs args) {
                using (sql.dataService service = new sql.dataService("notice"))
                {
                    noticeData = service.Select("notice", "date", false).AsDataView();
                    return;
                }
            });
            worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(delegate (object sender, RunWorkerCompletedEventArgs args) {
                NoticeViewer.ItemsSource = null;
                NoticeViewer.ItemsSource = noticeData;
                return;
            });
            worker.RunWorkerAsync();         
       }
            
        
        public void logout()
        {
            MainWindow.pageContainer.Navigate(new login());
        }
        private void button_Click(object sender, RoutedEventArgs e)
        {
            logout();
        }
        private void Tile_Click(object sender, RoutedEventArgs e)
        {
            updateNotice();
        }

        private void refreshPending()
        {
            BackgroundWorker worker = new BackgroundWorker();
            worker.DoWork += new DoWorkEventHandler(delegate (object sender, DoWorkEventArgs args) {
                using (sql.dataService service = new sql.dataService("registration"))
                {
                    pendingNumbers = service.Select("*", "").Rows.Count.ToString();
                }
            });
            worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(delegate (object sender, RunWorkerCompletedEventArgs args) {
                Pending.Count = pendingNumbers;
            });
            worker.RunWorkerAsync();
        }

        private void refreshOnline()
        {
            BackgroundWorker worker = new BackgroundWorker();
            worker.DoWork += new DoWorkEventHandler(delegate (object sender, DoWorkEventArgs args) {
                using (sql.dataService service = new sql.dataService("details"))
                {
                    onlineNumbers = service.Select("*", "status='online'").Rows.Count.ToString();
                }
            });
            worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(delegate (object sender, RunWorkerCompletedEventArgs args) {
                Online.Count = onlineNumbers;
            });
            worker.RunWorkerAsync(); 
        }

        private void refreshTask()
        {
            BackgroundWorker worker = new BackgroundWorker();
            worker.DoWork += new DoWorkEventHandler(delegate (object sender, DoWorkEventArgs args) {
                using (sql.dataService service = new sql.dataService("task"))
                {
                    taskNumbers = service.Select("*", "").Rows.Count.ToString();
                }
            });
            worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(delegate (object sender, RunWorkerCompletedEventArgs args) {
                Task.Count = taskNumbers;
            });
            worker.RunWorkerAsync();
        }

        private void refreshNotice()
        {
            BackgroundWorker worker = new BackgroundWorker();
            worker.DoWork += new DoWorkEventHandler(delegate (object sender, DoWorkEventArgs args) {
                using (sql.dataService service = new sql.dataService("notice"))
                {
                    noticeNumbers = service.Select("notice", "").Rows.Count.ToString();
                }
            });
            worker.RunWorkerCompleted += new RunWorkerCompletedEventHandler(delegate (object sender, RunWorkerCompletedEventArgs args) {
                Notice.Count = noticeNumbers;
            });
            worker.RunWorkerAsync();
        }
        private void OnTimedEvent(Object source, System.Timers.ElapsedEventArgs e)
        {
            //Refresher
            this.Dispatcher.Invoke(new Action(updateNotice));
            this.Dispatcher.Invoke(new Action(refreshOnline));
            this.Dispatcher.Invoke(new Action(refreshPending));
            this.Dispatcher.Invoke(new Action(refreshTask));
            this.Dispatcher.Invoke(new Action(refreshNotice));


        }

        private void runTimer ()
        {
            System.Timers.Timer timer = new System.Timers.Timer(3000.0);
            timer.Elapsed += OnTimedEvent;
            timer.AutoReset=true;
            timer.Enabled = true;
        }

        private void Online_Click(object sender, RoutedEventArgs e)
        {
            Online online = new Online();
            online.ShowDialog();
        }

        private void Task_Click(object sender, RoutedEventArgs e)
        {
            Task task = new Task();
            task.ShowDialog();
        }

        private void Notice_Click(object sender, RoutedEventArgs e)
        {
            Notice notice1 = new Notice();
            notice1.ShowDialog();
        }

        private void Pending_Click(object sender, RoutedEventArgs e)
        {
            Pending pending = new Pending();
            pending.ShowDialog();
        }

         
    }
}
