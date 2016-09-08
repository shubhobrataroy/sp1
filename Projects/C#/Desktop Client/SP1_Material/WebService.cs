using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace SP1_Material
{
    class WebService
    {
       
        public static string webRequest(string url)
        {
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            using (HttpWebResponse response = (HttpWebResponse)request.GetResponse())
            using (Stream steam = response.GetResponseStream())
                using(StreamReader reader = new StreamReader(steam))
                return reader.ReadToEnd();
        }

       public static string login (string username,string password)
        {
            string url = "http://localhost/webService/login.php?username=" + username + "&password=" + password;
            return webRequest(url);
        }
    }
}
