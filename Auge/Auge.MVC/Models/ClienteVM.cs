using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class ClienteVM
    {
        public int ClienteID { get; set; }
        public string Nome { get; set; }
        public string Email { get; set; }
        public IList<TelefoneVM> Telefones { get; set; }
        public string Endereco { get; set; }
    }
}
