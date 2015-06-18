using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Auge.MVC.Areas.Administrativo.Models
{
    public class PessoaLojaResponsavelVM
    {
        public PessoaLojaResponsavelVM()
        {
            this.TelefonesResponsavel = new List<TelefoneVM>();
        }

        public static PessoaLojaResponsavelVM Create() 
        {
            var responsavel = new PessoaLojaResponsavelVM();
            responsavel.CriarTelefonesResponsavelLoja();
            return responsavel;
        }

        [Required(ErrorMessage = "Informe o nome do responsável da Loja")]
        [MaxLength(70, ErrorMessage = "O nome deverá conter no máximo 70 caracteres")]
        [Display(Name="Nome")]
        public string NomeResponsavel { get; set; }

        [DataType(DataType.EmailAddress)]
        [Display(Name = "E-mail")]
        public string EmailResponsavel { get; set; } 

        public IList<TelefoneVM> TelefonesResponsavel { get; set; }

        public bool Remover { get; set; }

        public void CriarTelefonesResponsavelLoja(int count = 1)
        {
            for (int i = 0; i < count; i++)
            {
                TelefonesResponsavel.Add(new TelefoneVM());
            }
        }
    }
}