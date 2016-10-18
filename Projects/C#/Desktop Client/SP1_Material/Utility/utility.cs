using System;

namespace tools
{
    class utility
    {
        public static string ConvertToDateString (object time)
        {
            return ((DateTime)time).Date.ToString("d");
        }

        public static DateTime ConvertToDate (object time)
        {
            return ((DateTime)time).Date;
        }

        public static string CurrentDateTimeString()
        {
            return DateTime.Now.ToString();
        }

        public static string CurrentDateString ()
        {
            return DateTime.Now.Date.ToString("d");
        }
        public static string currentTimeString ()
        {
            return DateTime.Now.TimeOfDay.ToString();
        }
    }
}
