using System;
using System.Linq;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using Auge.Repository.Repositories;
using Auge.Tests.Repository.Context;

namespace Auge.Tests.Repository.Repositories
{
    [TestClass]
    public class PessoaRepositoryTestWithDB
    {
        AugeTestContext databaseContext;
        PessoaRepository objRepo;

        [TestInitialize]
        public void Initialize()
        {

            databaseContext = new Auge.Tests.Repository.Context.AugeTestContext();
            objRepo = new PessoaRepository(databaseContext);

        }

        [TestMethod]
        public void Country_Repository_Get_ALL()
        {
            //Act
            var result = objRepo.GetAll().ToList();

            //Assert

            Assert.IsNotNull(result);
            Assert.AreEqual(3, result.Count);            
            Assert.AreEqual("Djair", result[0].Nome);
        }

        //[TestMethod]
        //public void Country_Repository_Create()
        //{
        //    //Arrange
        //    Country c = new Country() { Name = "UK" };

        //    //Act
        //    var result = objRepo.Add(c);
        //    databaseContext.SaveChanges();

        //    var lst = objRepo.GetAll().ToList();

        //    //Assert

        //    Assert.AreEqual(4, lst.Count);
        //    Assert.AreEqual("UK", lst.Last().Name);
        //}
    }
}
