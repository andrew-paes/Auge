using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Loja : BaseEntity
    {
        public Loja()
        {
            this.Clientes = new List<Cliente>();
            this.Projetos = new List<Projeto>();
            this.UsuarioLojas = new List<UsuarioLoja>();
            this.PessoaLojaResponsaveis = new List<PessoaLojaResponsavel>();
        }

        public int LojaId { get; set; }
        public int PessoaJuridicaId { get; set; }

        public int DiasConfirmacaoMedidasConclusaoMontagem { get; set; }
        public int DiasConfirmacaoMedidas { get; set; }
        public int DiasConferenciaProjeto { get; set; }
        public string EmailNotificacoes { get; set; }
        public decimal PorcentagemFaturamento { get; set; }

        public virtual ICollection<Cliente> Clientes { get; set; }
        public virtual ICollection<Projeto> Projetos { get; set; }
        public virtual ICollection<UsuarioLoja> UsuarioLojas { get; set; }        
        public virtual ICollection<PessoaLojaResponsavel> PessoaLojaResponsaveis { get; set; }
        public virtual PessoaJuridica PessoaJuridica { get; set; }

       
    }
}
