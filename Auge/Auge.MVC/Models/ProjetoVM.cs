using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Auge.MVC.Models
{
    public class ProjetoVM
    {
        public ProjetoVM()
        {
            Cliente = new ClienteVM();
        }
        public int ProjetoID { get; set; }
        
        [Required(ErrorMessage = "Informe a loja.")]
        public LojaVM Loja { get; set; }
        
        [Required(ErrorMessage = "Informe o usuário")]
        public UsuarioVM Usuario { get; set; }
        public string IdentificadorInternoLoja { get; set; }
        
        [Required(ErrorMessage = "Informe os dados do cliente.")]
        public ClienteVM Cliente { get; set; }

        [Required(ErrorMessage = "Informe as perguntas gerais.")]
        public IList<PerguntaVM> PerguntasGerais { get; set; }

        [Required(ErrorMessage = "Informe os ambientes.")]
        public IList<AmbienteVM> Ambientes { get; set; }

    }
}