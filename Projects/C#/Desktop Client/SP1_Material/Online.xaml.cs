using MahApps.Metro.Controls;
using System;
using System.Collections.Generic;
using System.Data;
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
using System.Windows.Shapes;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Online.xaml
    /// </summary>
    public partial class Online : MetroWindow
    {
        public Online()
        {
            InitializeComponent();
            using (sql.dataService service = new sql.dataService("details"))
            {
               OnlineTable.ItemsSource= service.Select("username,privilege,status", "status='online'").AsDataView();
            }
        }
    }
}
