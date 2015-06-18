using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class UsuarioVM
    {
        public int UsuarioID { get; set; }

        [Required(ErrorMessage = "Informe o nome do usuário.")]
        [MaxLength(150, ErrorMessage = "O nome deve conter no máximo 150 caracteres.")]
        public string Nome { get; set; }
        
        [Required(ErrorMessage = "Informe o usuário.")]
        [MaxLength(150, ErrorMessage = "O usuário deve conter no máximo 150 caracteres.")]
        public string Usuario { get; set; }
        
        [Required(ErrorMessage = "Informe o nome da loja.")]
        [MaxLength(150, ErrorMessage = "O nome deve conter no máximo 150 caracteres.")]
        public string Senha { get; set; }
    }
}
