using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Projeto : BaseEntity
    {
        public Projeto()
        {
            this.HistoricoProjetos = new List<HistoricoProjeto>();
            this.ProjetoAmbientes = new List<ProjetoAmbiente>();
            this.ProjetoPerguntaRespostas = new List<ProjetoPerguntaResposta>();
        }

        public int ProjetoId { get; set; }
        public int LojaId { get; set; }
        public string IdentificadorProjetoLoja { get; set; }
        public int UsuarioProjetistaId { get; set; }
        public int ClienteId { get; set; }
        public int EtapaId { get; set; }
        public virtual Cliente Cliente { get; set; }
        public virtual ICollection<HistoricoProjeto> HistoricoProjetos { get; set; }
        public virtual Loja Loja { get; set; }
        public virtual ICollection<ProjetoAmbiente> ProjetoAmbientes { get; set; }
        public virtual ICollection<ProjetoPerguntaResposta> ProjetoPerguntaRespostas { get; set; }

        public virtual Usuario UsuarioProjetista { get; set; }
    }
}
