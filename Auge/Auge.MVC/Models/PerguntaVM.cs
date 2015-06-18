using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.MVC.Models
{
    public class PerguntaVM
    {
        public int PerguntaID { get; set; }
        public string Pergunta { get; set; }
        public IEnumerable<RespostaPerguntaVM> Respostas { get; set; }
    }
}
