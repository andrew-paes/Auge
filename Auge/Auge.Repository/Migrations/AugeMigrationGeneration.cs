using MySql.Data.Entity;
using System;
using System.Collections.Generic;
using System.Data.Entity.Migrations.Model;
using System.Data.Entity.Migrations.Sql;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Repository.Migrations
{
    public class AugeMigrationGeneration : MySqlMigrationSqlGenerator
    {
        protected override MigrationStatement Generate(DropForeignKeyOperation dropForeignKeyOperation)
        {
            dropForeignKeyOperation.Name = StripDbo(dropForeignKeyOperation.Name);
            return base.Generate(dropForeignKeyOperation); 	        
        }

        protected override MigrationStatement Generate(DropIndexOperation dropIndexOperation)
        {
            dropIndexOperation.Name = StripDbo(dropIndexOperation.Name);
            return base.Generate(dropIndexOperation);
        }

        protected override MigrationStatement Generate(DropPrimaryKeyOperation dropPrimaryKeyOperation)
        {
            dropPrimaryKeyOperation.Name = StripDbo(dropPrimaryKeyOperation.Name);
            return base.Generate(dropPrimaryKeyOperation);

        }

        //protected override MigrationStatement Generate(DropColumnOperation dropColumnOperation)
        //{
        //    var newDrop = new DropColumnOperation(dropColumnOperation.Table, 
        //                                          StripDbo(dropColumnOperation.Name),
        //                                          dropColumnOperation.Inverse);
            
        //    //dropColumnOperation.Name = StripDbo(dropColumnOperation.Name);
        //    return base.Generate(newDrop);            
        //}

        protected override MigrationStatement Generate(AlterColumnOperation alterColumnOperation)
        {
            alterColumnOperation.Column.Name = StripDbo(alterColumnOperation.Column.Name);
            return base.Generate(alterColumnOperation);
        }

        private string StripDbo(string name)
        {
            return name.Replace("dbo.", "");
        }
    }
}
