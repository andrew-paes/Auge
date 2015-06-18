using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Pessoa : BaseEntity
    {
        public Pessoa()
        {
            this.Clientes = new List<Cliente>();
            this.PessoasJuridicas = new List<PessoaJuridica>();
            this.Telefones = new List<Telefone>();
            this.Enderecos = new List<Endereco>();
            this.Usuarios = new List<Usuario>();
            this.PessoaLojaResponsaveis = new List<PessoaLojaResponsavel>();
        }

        public int PessoaId { get; set; }
        public string Nome { get; set; }
        public string Email { get; set; }
        public bool Ativo { get; set; }
        
        public virtual ICollection<Cliente> Clientes { get; set; }
        public virtual PessoaFisica PessoaFisica { get; set; }
        public virtual ICollection<PessoaJuridica> PessoasJuridicas { get; set; }
        public virtual ICollection<Telefone> Telefones { get; set; }
        public virtual ICollection<Endereco> Enderecos { get; set; }
        public virtual ICollection<Usuario> Usuarios { get; set; }
        public virtual ICollection<PessoaLojaResponsavel> PessoaLojaResponsaveis { get; set; }

        //public void CriarTelefone(int count = 1)
        //{
        //    for (int i = 0; i < count; i++)
        //    {
        //        Telefones.Add(new Telefone());
        //    }
        //}

        //public void CriarResponsavelLoja(int count = 1)
        //{
        //    for (int i = 0; i < count; i++)
        //    {
        //        PessoaLojaResponsaveis.Add(new PessoaLojaResponsavel());
        //    }
        //}
        
    }
}
