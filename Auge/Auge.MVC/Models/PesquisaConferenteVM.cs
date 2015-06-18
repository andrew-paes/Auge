using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class PesquisaConferenteVM
    {
        public UsuarioVM Usuario { get; set; }
        public LojaVM Loja { get; set; }
        public ProjetoVM Projeto { get; set; }
        public ClienteVM Cliente { get; set; }
        public IList<ProjetoVM> Projetos { get; set; }
    }
}