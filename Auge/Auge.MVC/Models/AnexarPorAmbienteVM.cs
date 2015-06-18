using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class AnexarPorAmbienteVM
    {
        public UsuarioVM Usuario { get; set; }
        public IList<AmbienteVM> Ambientes { get; set; }

        public AnexarPorAmbienteVM()
        {
            Usuario = new UsuarioVM();
            Ambientes = new List<AmbienteVM>();
        }
    }
}