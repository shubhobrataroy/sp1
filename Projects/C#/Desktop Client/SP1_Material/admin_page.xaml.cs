using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading;
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
using System.Windows.Threading;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for admin_page.xaml
    /// </summary>
    public partial class admin_page : Page
    {
        
        public admin_page()
        {
            InitializeComponent();
            
            //Loading data to all components for the 1st time
            this.Dispatcher.Invoke(new Action(updateNotice));
            this.Dispatcher.Invoke(new Action(refreshOnline));
            this.Dispatcher.Invoke(new Action(refreshPending));
            this.Dispatcher.Invoke(new Action(refreshTask));
            this.Dispatcher.Invoke(new Action(refreshNotice));


            runTimer();   
        }
        public void updateNotice()
        {
            
            using (sql.dataService service = new sql.dataService("notice"))
            {
                NoticeViewer.ItemsSource = null;
                NoticeViewer.ItemsSource = service.Select("notice","date",false).AsDataView();

            }
            
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
            using (sql.dataService service = new sql.dataService("registration"))
            {
                Pending.Count=service.Select("*","").Rows.Count.ToString();
            }
        }

        private void refreshOnline()
        {
            using (sql.dataService service = new sql.dataService("details"))
            {
                Online.Count = service.Select("*", "status='online'").Rows.Count.ToString();
            }
        }

        private void refreshTask()
        {
            using (sql.dataService service = new sql.dataService("task"))
            {
                Task.Count = service.Select("*", "").Rows.Count.ToString();
            }
        }

        private void refreshNotice()
        {
            using (sql.dataService service = new sql.dataService("notice"))
            {
                Notice.Count = service.Select("notice", "").Rows.Count.ToString();
            }
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
