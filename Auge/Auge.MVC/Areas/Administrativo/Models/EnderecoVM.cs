using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Areas.Administrativo.Models
{
    public class EnderecoVM
    {
        [HiddenInput(DisplayValue = false)]
        public int EnderecoId { get; set; }

        [HiddenInput(DisplayValue = false)]
        public int PessoaId { get; set; }

        [Required]
        [MaxLength(50, ErrorMessage="O nome da rua não pode conter mais de que 50 caracteres")]
        public string Rua { get; set; }

        [Required]
        [MaxLength(10, ErrorMessage = "O número da rua não pode conter mais de que 10 caracteres")]
        [Display(Name="Número")]
        public string Numero { get; set; }


        [Required]
        [MaxLength(50, ErrorMessage = "O nome da rua não pode conter mais de que 50 caracteres")]       
        public string Bairro { get; set; }

        [Required]
        [MaxLength(50, ErrorMessage = "O nome da rua não pode conter mais de que 50 caracteres")]
        public string Cidade { get; set; }

        [Required]
        [MaxLength(30, ErrorMessage = "O nome da rua não pode conter mais de que 30 caracteres")]
        public string Estado { get; set; }

        [Required]
        [MaxLength(10, ErrorMessage = "O nome da rua não pode conter mais de que 10 caracteres")]
        public string Cep { get; set; }

        [HiddenInput(DisplayValue = false)]
        public bool Remover { get; set; }
    }
}


/*
 
           this.Property(t => t.Cep)
                .HasMaxLength(10);

          

            this.Property(t => t.Estado)
                .HasMaxLength(30);
            
           

            this.Property(t => t.Rua)                
                .HasMaxLength(50);

 */