using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Config
{
    class Configure
    {
        public static string connectionString;
        public static bool WriteConfiguration(string ip, string username, string password, string database_name)
        {
            try
            {
                using (StreamWriter writer = new StreamWriter("conf.config"))
                {
                    string connectionString= @"server="+ip+";userid="+username+";password="+password+";database="+database_name+";Convert Zero Datetime=True";
                    writer.WriteLineAsync(connectionString);
                    return true;
                }
            } catch (Exception e) { return false; }
        }

        public static void ReadConfiguration()
        {
            using (StreamReader reader = new StreamReader("conf.config"))
            {
                connectionString= reader.ReadLine();
            }
        }
    }
}
