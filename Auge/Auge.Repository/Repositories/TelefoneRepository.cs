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
    public class TelefoneRepository : GenericRepository<Telefone>, ITelefoneRepository
    {
        public TelefoneRepository(DbContext context)
            : base(context)
        {

        }

        public override IEnumerable<Telefone> GetAll()
        {
            return _entities.Set<Telefone>().Include(x => x.Pessoa).AsEnumerable();
        }

        public Telefone GetById(long id)
        {
            return _dbset.Include(x => x.Pessoa).Where(x => x.TelefoneId == id).FirstOrDefault();
        }
    }

}
