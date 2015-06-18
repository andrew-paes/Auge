using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class PesquisaProjetoVM
    {
        public ClienteVM Cliente { get; set; }
        public ProjetoVM Projeto { get; set; }
        public IList<ProjetoVM> Projetos { get; set; }
    }
}