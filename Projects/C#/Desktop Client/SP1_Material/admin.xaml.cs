﻿using System;
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

namespace SP1_Material
{
    /// <summary>
    /// Interaction logic for admin.xaml
    /// </summary>
    public partial class admin : Page
    {
        public admin()
        {
            InitializeComponent();
        }

        public void logout()
        {
            MainWindow.pageContainer.Navigate(new login());
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            logout();
        }


    }
}
