!function(n){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=n();else if("function"==typeof define&&define.amd)define([],n);else{var e;e="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,e.CS_worker=n()}}(function(){return function(){function n(e,t,r){function o(f,u){if(!t[f]){if(!e[f]){var a="function"==typeof require&&require;if(!u&&a)return a(f,!0);if(i)return i(f,!0);var s=new Error("Cannot find module '"+f+"'");throw s.code="MODULE_NOT_FOUND",s}var d=t[f]={exports:{}};e[f][0].call(d.exports,function(n){var t=e[f][1][n];return o(t||n)},d,d.exports,n,e,t,r)}return t[f].exports}for(var i="function"==typeof require&&require,f=0;f<r.length;f++)o(r[f]);return o}return n}()({1:[function(n,e,t){"use strict";function r(n){var e=n.imageData,t=o(e.data),r=t.dominant;postMessage({dominant:r})}function o(n,e){function t(n){return"transparent"===n||-1!==n.indexOf("rgb")||-1!==n.indexOf("hsl")?n:["rgb(",n,")"].join("")}function r(n,e){return{name:t(n),count:e}}e=e||{};for(var o=e.exclude||[],i=e.paletteSize||10,f={},u="",a=[],s=0;s<n.length;s+=4)a[0]=n[s],a[1]=n[s+1],a[2]=n[s+2],u=a.join(","),-1===a.indexOf(void 0)&&(n[s+3]<85&&(u="transparent"),-1===o.indexOf(t(u))&&(f[u]=u in f?f[u]+1:1));var d=function(n,e){if(n.length>e)return n.slice(0,e);for(var t=n.length-1;t<e-1;t++)n.push(r("0,0,0",0));return n}(function(n){var e=[];for(var t in n)e.push(r(t,n[t]));return e.sort(function(n,e){return e.count-n.count}),e}(f),i+1);return{dominant:d[0].name,secondary:d[1].name,palette:d.map(function(n){return n.name}).slice(1)}}var i={"image-contrast":r};onmessage=function(n){var e=n.data,t=e.task,r=e.data;i[t]?i[t](r):postMessage({error:"Task not registered"})}},{}]},{},[1])(1)});