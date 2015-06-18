using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class LojaVM
    {
        [Required(ErrorMessage = "Informe o identificador da loja.")]
        public int LojaID { get; set; }

        [Required(ErrorMessage = "Informe o nome da loja.")]
        [MaxLength(150, ErrorMessage="O nome deve conter no máximo 150 caracteres.")]
        public string Nome { get; set; }

        public IList<TelefoneVM> Telefones { get; set; }
    }
}
