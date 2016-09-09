using System.Data;

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Notice.xaml
    /// </summary>
    public partial class Notice : MahApps.Metro.Controls.MetroWindow
    {
        public Notice()
        {
            InitializeComponent();
            using (sql.dataService service = new sql.dataService("notice"))
            {
                TaskTable.ItemsSource = service.Select("*", "Date",false).AsDataView();
            }
        }
    }
}
