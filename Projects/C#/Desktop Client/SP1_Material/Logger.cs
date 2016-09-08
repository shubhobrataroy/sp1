using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Test
{
    class Logger
    {
        public static StringBuilder exceptions = new StringBuilder("");

        public static void AppendException(String exception_details)
        {
            exceptions.Append(exception_details);
            exceptions.Append("\n\n\n");
        }

        public static void PrintExceptions()
        {
            Console.WriteLine(exceptions.ToString());
        }
        
        public static string GetExceptionList ()
        {
            return exceptions.ToString();
        }

        public static void WriteExceptionsToLog()
        {
            using (StreamWriter writer = new StreamWriter("log.txt"))
                writer.WriteLine(exceptions.ToString());

        }
    }
}
