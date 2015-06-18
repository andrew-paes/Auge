using Auge.Model.Entities;
using Auge.Model.Interfaces.Services;
using Auge.MVC.Areas.Administrativo.Models;
using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Areas.Administrativo.Controllers
{
    public class LojaController : Controller
    {
        private ILojaService _lojaService;

        public LojaController(ILojaService lojaService)
        {
            this._lojaService = lojaService;
        }

        // GET: Administrativo/Lojas
        public ActionResult Index()
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
                            //Telefones = new List<Telefone>()
                            //{
                            //    new Telefone() { Numero = "98765432"}
                            //} 
                        }
                    }
                    
                }
            };

            var model = Mapper.Map<ICollection<Loja>, ICollection<LojaVM>>(lojas);

            return View(model);
        }

        // GET: Administrativo/Lojas/Details/5
        public ActionResult Detalhes(int id)
        {
            return View();
        }

        
        public ActionResult Novo()
        {
            var model = LojaVM.Create();
            
            return View(model);
        }

        
        [HttpPost]
        public ActionResult Novo(LojaVM lojaVM)
        {
            try
            {
                Loja loja = Mapper.Map<LojaVM, Loja>(lojaVM);
                //_lojaService.Create()
                return View(lojaVM);
                //return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        public ActionResult CadastroGerente()
        {
            return View();
        }


        // GET: Administrativo/Lojas/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: Administrativo/Lojas/Edit/5
        [HttpPost]
        public ActionResult Edit(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add update logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Administrativo/Lojas/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: Administrativo/Lojas/Delete/5
        [HttpPost]
        public ActionResult Delete(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add delete logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}
