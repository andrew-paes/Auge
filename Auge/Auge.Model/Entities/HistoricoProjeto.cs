using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class HistoricoProjeto : BaseEntity
    {
        public int HistoricoProjetoId { get; set; }
        public int ProjetoId { get; set; }
        public int EtapaId { get; set; }
        public string Descricao { get; set; }
        public System.DateTime DataCadastro { get; set; }
        public virtual Etapa Etapa { get; set; }
        public virtual Projeto Projeto { get; set; }
    }
}
