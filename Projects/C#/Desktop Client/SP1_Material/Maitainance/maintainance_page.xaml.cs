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

namespace SP1_Material.Maitainance
{
    /// <summary>
    /// Interaction logic for maintainance_page.xaml
    /// </summary>
    public partial class maintainance_page : Page
    {
        public maintainance_page()
        {
            InitializeComponent();
            try
            {
               previousString.Text= Config.Configure.connectionString;
            } catch (Exception e) { Test.Logger.AppendException(e.ToString()); previousString.Text = "no previous string"; }
        }

        private void update_Click(object sender, RoutedEventArgs e)
        {
            if(server_ip.Text!="" | username.Text!="" | database_name.Text!="")
            {
                Config.Configure.WriteConfiguration(server_ip.Text, username.Text, password.Text, database_name.Text);
                currentString.Text= Config.Configure.connectionString;
            }
        }
    }
}
