using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Auge.MVC.Areas.Administrativo.Models
{
    public class LojaVM
    {
        public LojaVM()
        {
            this.Telefones = new List<TelefoneVM>();
            this.Enderecos = new List<EnderecoVM>();
            this.PessoaLojaResponsaveis = new List<PessoaLojaResponsavelVM>();
        }

        public static LojaVM Create()
        {
            var loja = new LojaVM();
            loja.CriarEnderecos();
            loja.CriarResponsaveisLoja();
            loja.CriarTelefones();

            return loja;
        }

        [Required(ErrorMessage="Informe o nome da Loja")]
        [MaxLength(70, ErrorMessage = "O nome deverá conter no máximo 70 caracteres")]
        public string Nome { get; set; }
        
        [Required(ErrorMessage = "Informe o CNPJ da Loja")]
        [MaxLength(20, ErrorMessage = "O nome deverá conter no máximo 20 caracteres")]
        public string Cnpj { get; set; }

        [Required(ErrorMessage = "Informe a porcentagem de faturamento acordada com a Loja")]
        [DataType(DataType.Currency)]
        [Display(Name="Porcentagem de Faturamento")]
        public int PorcentagemFaturamento { get; set; }

        [Required(ErrorMessage = "Informe o tempo (em dias) definido da confirmação de medida até a entrega do relatório de conclusão da montagem")]
        [Display(Name = "Tempo (em dias) definido da confirmação de medida até a entrega do relatório de conclusão da montagem")]
        public int DiasConfirmacaoMedidasConclusaoMontagem { get; set; }

        [Required(ErrorMessage = "Informe o tempo (em dias) definido para a confirmação de medida")]
        [Display(Name = "Tempo (em dias) definido para a confirmação de medida")]
        public int DiasConfirmacaoMedidas { get; set; }

        [Required(ErrorMessage = "Informe o tempo (em dias) para a conferencia do projeto")]
        [Display(Name = "Tempo (em dias)  definido para a conferência do projeto")]
        public int DiasConferenciaProjeto { get; set; }

        [DataType(DataType.EmailAddress)]
        [Display(Name = "E-mail para notificações do sistema")]
        public string EmailNotificacoes { get; set; }

        public IList<TelefoneVM> Telefones { get; set; }

        public IList<EnderecoVM> Enderecos { get; set; }

        public IList<PessoaLojaResponsavelVM> PessoaLojaResponsaveis { get; set; }

        public void CriarTelefones(int count = 1)
        {
            for (int i = 0; i < count; i++)
            {
                Telefones.Add(new TelefoneVM());
            }
        }

        public void CriarEnderecos(int count = 1)
        {
            for (int i = 0; i < count; i++)
            {
                Enderecos.Add(new EnderecoVM());
            }
        }

        public void CriarResponsaveisLoja(int count = 1)
        {
            for (int i = 0; i < count; i++)
            {
                PessoaLojaResponsaveis.Add(PessoaLojaResponsavelVM.Create());
            }
        }

    }
}