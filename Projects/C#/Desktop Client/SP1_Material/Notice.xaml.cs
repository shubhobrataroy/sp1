﻿using System;
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
    /// Interaction logic for Notice.xaml
    /// </summary>
    public partial class Notice : MahApps.Metro.Controls.MetroWindow
    {
        public Notice()
        {
            InitializeComponent();
            using (sql.dataService service = new sql.dataService("notice"))
            {
                TaskTable.ItemsSource = service.Select("*", "").AsDataView();
            }
        }
    }
}
