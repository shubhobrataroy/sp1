using System.Data;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Online.xaml
    /// </summary>
    public partial class Online : MahApps.Metro.Controls.MetroWindow
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
