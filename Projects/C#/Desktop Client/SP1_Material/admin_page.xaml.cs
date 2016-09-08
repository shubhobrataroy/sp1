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
            runTimer();   
        }
        public void updateNotice()
        {
            using (sql.dataService service = new sql.dataService("notice"))
            {
                NoticeViewer.ItemsSource = null;
                NoticeViewer.ItemsSource = service.Select("notice", "").AsDataView();
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
        private void OnTimedEvent(Object source, System.Timers.ElapsedEventArgs e)
        {
            //Refresher
            this.Dispatcher.Invoke(new Action(updateNotice));

        }

        private void runTimer ()
        {
            System.Timers.Timer timer = new System.Timers.Timer(10000.0);
            timer.Elapsed += OnTimedEvent;
            timer.AutoReset=true;
            timer.Enabled = true;
        }
        
    }
}
