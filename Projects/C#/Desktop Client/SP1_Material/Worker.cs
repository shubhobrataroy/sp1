using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SP1_Material
{
    class Worker
    {
        BackgroundWorker workers;
        Delegate[] tasks;
        public Worker()
        {
            workers = new BackgroundWorker();
        }
        public void addTask(params Delegate[] tasks)
        {
            this.tasks = tasks;
            workers.RunWorkerCompleted += new RunWorkerCompletedEventHandler(workDone);
            workers.DoWork += new DoWorkEventHandler(doWork);
            workers.RunWorkerAsync();

        }

        private void doWork(object sender, DoWorkEventArgs args)
        {
            int length = tasks.Length;
            //foreach (Delegate task in tasks)
                
        }
        private void workDone(object sender , RunWorkerCompletedEventArgs args)
        { }
    }
}
