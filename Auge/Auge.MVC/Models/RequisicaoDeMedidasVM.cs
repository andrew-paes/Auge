using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class RequisicaoDeMedidasVM
    {
        public ClienteVM Cliente { get; set; }
        public UsuarioVM Usuario { get; set; }

        [Display(Name= "Data da Medição")]
        public DateTime DataAgendamento { get; set; }

        public RequisicaoDeMedidasVM()
        {
            Cliente = new ClienteVM();
            Usuario = new UsuarioVM();
        }
    }
}