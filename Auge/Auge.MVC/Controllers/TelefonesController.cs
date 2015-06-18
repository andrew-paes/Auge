using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Auge.Model.Entities;
using Auge.Model.Interfaces.Services;

namespace Auge.MVC.Controllers
{
    public class TelefonesController : Controller
    {
        IPessoaService _pessoaService;
        ITelefoneService _telefoneService;

        public TelefonesController(IPessoaService pessoaService, ITelefoneService telefoneService)
        {
            this._pessoaService = pessoaService;
            this._telefoneService = telefoneService;
        }

        // GET: Telefones
        public ActionResult Index()
        {
            var telefone = _telefoneService.GetAll();
            return View(telefone.ToList());
        }

        // GET: Telefones/Details/5
        public ActionResult Details(long? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }

            Telefone telefone = _telefoneService.GetById(id.Value);

            if (telefone == null)
            {
                return HttpNotFound();
            }
            return View(telefone);
        }

        // GET: Telefones/Create
        public ActionResult Create()
        {
            ViewBag.PessoaId = new SelectList(_pessoaService.GetAll(), "Id", "Nome");
            return View();
        }

        // POST: Telefones/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,TelefoneId,PessoaId,Numero,CreatedDate,CreatedBy,UpdatedDate,UpdatedBy")] Telefone telefone)
        {
            if (ModelState.IsValid)
            {
                _telefoneService.Create(telefone);
                return RedirectToAction("Index");
            }

            ViewBag.PessoaId = new SelectList(_pessoaService.GetAll(), "Id", "Nome", telefone.PessoaId);
            return View(telefone);
        }

        // GET: Telefones/Edit/5
        public ActionResult Edit(long? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Telefone telefone = _telefoneService.GetById(id.Value);
            if (telefone == null)
            {
                return HttpNotFound();
            }
            ViewBag.PessoaId = new SelectList(_pessoaService.GetAll(), "Id", "Nome", telefone.PessoaId);
            return View(telefone);
        }

        // POST: Telefones/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,TelefoneId,PessoaId,Numero,CreatedDate,CreatedBy,UpdatedDate,UpdatedBy")] Telefone telefone)
        {
            if (ModelState.IsValid)
            {
                _telefoneService.Update(telefone);
                return RedirectToAction("Index");
            }
            ViewBag.PessoaId = new SelectList(_pessoaService.GetAll(), "Id", "Nome", telefone.PessoaId);
            return View(telefone);
        }

        // GET: Telefones/Delete/5
        public ActionResult Delete(long? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Telefone telefone = _telefoneService.GetById(id.Value);
            if (telefone == null)
            {
                return HttpNotFound();
            }
            return View(telefone);
        }

        // POST: Telefones/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(long id)
        {
            Telefone telefone =_telefoneService.GetById(id);
            _telefoneService.Delete(telefone);
            return RedirectToAction("Index");
        }
    }
}
