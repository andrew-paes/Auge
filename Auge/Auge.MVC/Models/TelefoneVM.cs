using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class TelefoneVM
    {
        public int TelefoneID { get; set; }
        public ClienteVM Cliente { get; set; }
        public string Numero { get; set; }
    }
}
