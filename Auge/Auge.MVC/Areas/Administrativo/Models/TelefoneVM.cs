using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Areas.Administrativo.Models
{
    public class TelefoneVM
    {
        [HiddenInput(DisplayValue = false)]
        public int TelefoneId { get; set; }

        [HiddenInput(DisplayValue = false)]
        public int PessoaId { get; set; }
        
        //[Required(ErrorMessage="Informe o número de telefone não pode estar vazio.")]
        [Display(Name = "Número")]
        public string Numero { get; set; }

        public bool Remover { get; set; }
    }
}