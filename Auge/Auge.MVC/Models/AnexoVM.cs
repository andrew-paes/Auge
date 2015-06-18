using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class AnexoVM
    {
        public int AnexoID { get; set; }
        public AmbienteVM Ambiente { get; set; }
        public byte[] Arquivo { get; set; }
    }
}
