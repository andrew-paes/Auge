using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using Moq;
using System.Collections.Generic;
using Auge.Model.Entities;
using Auge.Model.Interfaces.Repositories;

namespace Auge.Tests.Repository.Repositories
{
    [TestClass]
    public class LojaRepositoryTest
    {
        public LojaRepositoryTest()
        {

        }


        [TestMethod]
        public void Consegue_recuperar_todos_os_registros()
        {
            var lojaRepository = new Mock<ILojaRepository>();
            lojaRepository.Setup(x => x.GetAll()).Returns(Dados());


        }

        private IEnumerable<Loja> Dados()
        { 
             var lojas = new List<Loja> 
            {
                new Loja() { 
                    LojaId = 1, 
                    PessoaJuridicaId = 1, 
                    PessoaJuridica = new PessoaJuridica() 
                    { 
                        PessoaId = 1, 
                        Cnpj = "123123",
                        Pessoa = new Pessoa() 
                        { 
                            Nome = "Fulano", 
                            Email = "a@b.com", 
                            Telefones = new List<Telefone>()
                            {
                                new Telefone() { Numero = "98765432"}
                            } 
                        }
                    }
                    
                },
                
                new Loja() { 
                    LojaId = 2, 
                    PessoaJuridicaId = 2, 
                    PessoaJuridica = new PessoaJuridica() 
                    { 
                        PessoaId = 2, 
                        Cnpj = "345345",
                        Pessoa = new Pessoa() 
                        { 
                            Nome = "Ciclano", 
                            Email = "d@s.com", 
                            Telefones = new List<Telefone>()
                            {
                                new Telefone() { Numero = "99999977"}
                            } 
                        }
                    }
                    
                },
                
                new Loja() { 
                    LojaId = 3, 
                    PessoaJuridicaId = 3, 
                    PessoaJuridica = new PessoaJuridica() 
                    { 
                        PessoaId = 3, 
                        Cnpj = "999789789789",
                        Pessoa = new Pessoa() 
                        { 
                            Nome = "Beltrano", 
                            Email = "g@gg.com", 
                            Telefones = new List<Telefone>()
                            {
                                new Telefone() { Numero = "88882245"}
                            } 
                        }
                    }
                    
                }
            };

             return lojas;
        }
    }
}
