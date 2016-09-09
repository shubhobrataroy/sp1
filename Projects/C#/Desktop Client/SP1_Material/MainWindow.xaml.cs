using System.Windows;
using System.Windows.Controls;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : MahApps.Metro.Controls.MetroWindow

    {
        public static Frame pageContainer;
        public MainWindow()
        {
            InitializeComponent();
            this.WindowState = WindowState.Maximized;
            pageContainer = container;
            container.Navigate(new login());
        }

        
        private void textBox_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void Login_Click(object sender, RoutedEventArgs e)
        {
            
        }
    }
}
