using System;
using MySql.Data.MySqlClient;
using System.Data;


namespace sql
{
    sealed class dataService : System.IDisposable
    {
        private string connectionString;
        private string tableName;
        private MySqlConnection connection;
        private MySqlCommand command;



        public dataService(string tableName)
        {
            //connectionString = @"server=localhost;userid=root;
            //password=;database=users;Convert Zero Datetime=True";
            try { connectionString = Config.Configure.connectionString; }
            catch (Exception e)
            {
                connectionString = @"server=localhost;userid=root;
                password=;database=users;Convert Zero Datetime=True";
                Test.Logger.AppendException(e.ToString());

            }
            connection = new MySqlConnection(connectionString);
            connection.Open();
            this.tableName = tableName;
            //Retry 
            int retry = 3;


            while (retry <= 0)
            {
                try
                {
                    connection.Open();
                    retry = 0;
                }
                catch (MySqlException e) { retry--; Test.Logger.AppendException(e.ToString()); }
            }
        }

        public void Dispose()
        {
            connection.Close();
            connection.Dispose();
            command.Dispose();
        }

        public bool ExecuteQuery(string query)
        {
            command = new MySqlCommand(query, connection);
            try
            {
                command.ExecuteNonQuery();
                return true;
            }
            catch (Exception e) { Test.Logger.AppendException(e.ToString()); return false; }
        }

        public DataTable ExecuteQueryForResults(string query)
        {
            command = new MySqlCommand(query, connection);
            try
            {
                command.ExecuteNonQuery();

                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    DataTable result = new DataTable();
                    result.Load(reader);
                    return result;
                }
            }
            catch (MySqlException e) { Test.Logger.AppendException(e.ToString()); return null; }
        }


        public String SelectOnlyOneValue(string column_name,string where)
        {
            string query = "Select " + column_name + " from " + tableName + " where " + where;
            command = new MySqlCommand(query, connection);
            command.ExecuteNonQuery();
            try
            {
                command.ExecuteNonQuery();

                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    reader.Read();
                    return reader[column_name].ToString();
                }
            }
            catch (MySqlException e) { Test.Logger.AppendException(e.ToString()); return null; }
        } 

        public DataTable Select(string collumn_name, string where)
        {
            if (collumn_name == "") collumn_name = "*";

            string query = "Select " + collumn_name + " from " + tableName;
            string query2 = "Select " + collumn_name + " from " + tableName + " where " + where;


            if (where == "")
                return ExecuteQueryForResults(query);
            else return ExecuteQueryForResults(query2);
        }

        public DataTable Select(string collumn_name, string order_by_column_name, bool ACENDING = true)
        {
            if (ACENDING)
                return ExecuteQueryForResults("Select " + collumn_name + " from " + tableName + " ORDER BY " + order_by_column_name + " ASC");

            else
                return ExecuteQueryForResults("Select " + collumn_name + " from " + tableName + " ORDER BY " + order_by_column_name + " DESC");
        }
        public bool Insert(string value_string)
        {
            return ExecuteQuery("Insert into " + tableName + " values (" + value_string + ")");
        }

        public bool Update(string collumn_name, string value, string where)
        {
            return ExecuteQuery("Update " + tableName + " set " + collumn_name + "=" + value + " where " + where);
        }

        public bool Delete(string where)
        {
            return ExecuteQuery("DELETE FROM " + tableName + " WHERE " + where);
        }
    }
}
