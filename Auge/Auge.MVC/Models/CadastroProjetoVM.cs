using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class CadastroProjetoVM
    {
        public CadastroProjetoVM()
        {
            Projeto = new ProjetoVM();
            Loja = new LojaVM();
            Usuario = new UsuarioVM();
        }

        public ProjetoVM Projeto { get; set; }
        public LojaVM Loja { get; set; }
        public UsuarioVM Usuario { get; set; }
    }
}