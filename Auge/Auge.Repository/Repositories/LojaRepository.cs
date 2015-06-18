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
    public class LojaRepository : GenericRepository<Loja>, ILojaRepository
    {
        public LojaRepository(DbContext context)
            : base(context)
        {

        }

        public override IEnumerable<Loja> GetAll()
        {
            //TODO: Testar
            return _entities.Set<Loja>()
                .Include(x => x.PessoaJuridica)
                .Include(x => x.PessoaJuridica.Pessoa)
                .AsEnumerable();
        }

        //public Telefone GetById(long id)
        //{
        //    return _dbset.Include(x => x.Pessoa).Where(x => x.TelefoneId == id).FirstOrDefault();
        //}
    }

}
