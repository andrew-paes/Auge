using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Pergunta : BaseEntity
    {
        public Pergunta()
        {
            this.AmbientePerguntas = new List<AmbientePergunta>();
            this.ProjetoPerguntaRespostas = new List<ProjetoPerguntaResposta>();
            this.RespostaPerguntas = new List<RespostaPergunta>();
        }

        public int PerguntaId { get; set; }
        public string Descricao { get; set; }
        public bool PerguntaGeral { get; set; }
        public virtual ICollection<AmbientePergunta> AmbientePerguntas { get; set; }
        public virtual ICollection<ProjetoPerguntaResposta> ProjetoPerguntaRespostas { get; set; }
        public virtual ICollection<RespostaPergunta> RespostaPerguntas { get; set; }
    }
}
