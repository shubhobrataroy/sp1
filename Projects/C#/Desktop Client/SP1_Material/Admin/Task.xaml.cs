using System.Data;


namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for Task.xaml
    /// </summary>
    public partial class Task : MahApps.Metro.Controls.MetroWindow
    {
        public Task()
        {
            InitializeComponent();
            using (sql.dataService service = new sql.dataService("task"))
            {
                TaskTable.ItemsSource = service.Select("*", "").AsDataView();
            }
        }
    }
}
