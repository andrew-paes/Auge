using Auge.Model.Entities;
using Auge.Model.Interfaces.Repositories;
using Auge.Repository.Common;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Repository.Repositories
{
    public class PessoaRepository : GenericRepository<Pessoa>, IPessoaRepository
    {
        public PessoaRepository(DbContext context)
            : base(context)
        {

        }

        public Pessoa GetById(int id)
        {
            return FindBy(x => x.PessoaId == id).FirstOrDefault();
        }
    }
}
