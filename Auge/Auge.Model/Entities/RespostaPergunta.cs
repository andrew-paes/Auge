using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class RespostaPergunta : BaseEntity
    {
        public RespostaPergunta()
        {
            this.ProjetoPerguntaRespostas = new List<ProjetoPerguntaResposta>();
            this.RespostaPergunta1 = new List<RespostaPergunta>();
        }

        public int RespostaPerguntaId { get; set; }
        public int PerguntaId { get; set; }
        public Nullable<int> RespostaPerguntaPaiId { get; set; }
        public int TipoRespostaId { get; set; }
        public string Descricao { get; set; }
        public virtual Pergunta Pergunta { get; set; }
        public virtual ICollection<ProjetoPerguntaResposta> ProjetoPerguntaRespostas { get; set; }
        public virtual ICollection<RespostaPergunta> RespostaPergunta1 { get; set; }
        public virtual RespostaPergunta RespostaPergunta2 { get; set; }
        public virtual TipoResposta TipoResposta { get; set; }
    }
}
