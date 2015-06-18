using Auge.Model.Common;
using Auge.Model.Entities;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Usuario : BaseEntity
    {
        public Usuario()
        {
            this.UsuarioLojas = new List<UsuarioLoja>();
            this.Projetos = new List<Projeto>();
        }

        public int UsuarioId { get; set; }
        public int PessoaId { get; set; }
        public string Senha { get; set; }
        public bool Ativo { get; set; }
        public virtual Pessoa Pessoa { get; set; }

        public virtual ICollection<UsuarioLoja> UsuarioLojas { get; set; }
        public virtual ICollection<UsuarioGrupo> UsuarioGrupos { get; set; }

        public virtual ICollection<Projeto> Projetos { get; set; }
    }
}
