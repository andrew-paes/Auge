using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Auge.MVC.Areas.Seguranca.Models
{
    public class LoginVM
    {
        [Required(ErrorMessage = "Informe o usuário.")]
        [MaxLength(50, ErrorMessage="O usuário não pode conter mais de 50 caracteres.")]
        [MinLength(2, ErrorMessage="O usuário não pode conter menos de 2 caracteres.")]
        public string Usuario { get; set; }

        [Required(ErrorMessage = "Informe a senha.")]
        [MaxLength(50, ErrorMessage = "A senha não pode conter mais de 50 caracteres.")]
        [MinLength(2, ErrorMessage = "O usuário não pode conter menos de 2 caracteres.")]
        [DataType(DataType.Password)]
        public string Senha { get; set; }
    }
}